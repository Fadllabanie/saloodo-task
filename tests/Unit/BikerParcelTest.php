<?php

namespace Tests\Unit;

use App\Enums\ParcelStatus;
use Tests\TestCase;
use App\Models\User;
use App\Models\Parcel;
use App\Enums\UserType;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BikerParcelTest extends TestCase
{
  use RefreshDatabase;
  use WithFaker;


  /** @test */
  public function check_display_all_parcels_work_with_ok_status_empty_data()
  {
    $sender = User::factory()->create([
      'type' => UserType::Biker()
    ]);

    $response = $this->actingAs($sender)->get('orders');
    $response->assertStatus(200);
    $response->assertSee('No Data');
  }


  /** @test */
  public function check_display_all_parcels_api_work_with_ok_status_empty_data()
  {
    $sender = User::factory()->create([
      'type' => UserType::Biker()
    ]);

    $response = $this->actingAs($sender)->get('parcels');
    $response->assertStatus(403);
  }
  /** @test */
  public function biker_can_pickup_parcel_by_id()
  {
    $biker = User::factory()->create([
      'type' => UserType::Biker()
    ]);
    
    $record = Parcel::factory()->create();
   
    $response = $this->actingAs($biker)->put('/pick-up-parcel/' . $record->id);
    
    $record->update([
      'biker_id' => $biker->id,
      'pick_up_at' => '2023-01-21 12:48:41',
     'status' => ParcelStatus::Processing(),
    ]);

    $response->assertStatus(302);  
    $this->assertDatabaseHas('parcels', [
      'id' => $record->id,
     'biker_id' => $record->biker_id,
     'pick_up_at' => $record->pick_up_at,
     'status' => $record->status,
    ]);
  }
   /** @test */
  public function biker_can_drop_off_parcel_by_id()
  {
    $biker = User::factory()->create([
      'type' => UserType::Biker()
    ]);
    
    $record = Parcel::factory()->create();
   
    $response = $this->actingAs($biker)->put('/drop-off-parcel/' . $record->id);
    $now = now();
    $record->update([
    'biker_id' => $biker->id,
    'drop_off_at' =>$now,
    'status' => ParcelStatus::Fulfilling(),
    ]);

    $response->assertStatus(302);  
    $this->assertDatabaseHas('parcels', [
    'id' => $record->id,
     'biker_id' => $record->biker_id,
     'drop_off_at' => $now,
     'status' => $record->status,
    ]);
  }

}

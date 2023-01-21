<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Parcel;
use App\Enums\UserType;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SenderParcelTest extends TestCase
{
  use RefreshDatabase;
  use WithFaker;


  /** @test */
  public function check_display_all_parcels_api_work_with_ok_status_empty_data()
  {
    $sender = User::factory()->create([
      'type' => UserType::Sender()
    ]);

    $response = $this->actingAs($sender)->get('parcels');
    $response->assertStatus(200);
    $response->assertSee('No Data');
    //$response->assertJson(['data' => []]);
  }

  /** @test */
  public function check_display_all_parcel_api_work_with_ok_status_with_one_record()
  {
    $sender = User::factory()->create([
      'type' => UserType::Sender()
    ]);

    $record = Parcel::factory()->create();
    $parcel = new Parcel();
    $firstFillable =  $parcel->getFillable()[0];
    $secFillable =  $parcel->getFillable()[1];

    $response = $this->actingAs($sender)->get('parcels');

    $response->assertStatus(200);
    $response->assertSee($record->$firstFillable);
    $response->assertSee($record->$secFillable);
    $this->assertDatabaseHas(
      'parcels',
      [
        $parcel->getFillable()[0] => $record->$firstFillable,
        $parcel->getFillable()[1] => $record->$secFillable
      ]
    );
  }

  /** @test */
  public function admin_can_create_parcel()
  {
    $sender = User::factory()->create([
      'type' => UserType::Sender()
    ]);

    $record = Parcel::factory()->make();

    $response = $this->actingAs($sender)->post('/parcels', $record->toArray());


    $response = $this->post('/parcels', $record->toArray());
    $response->assertStatus(200);  //<=== change

    $this->assertEquals(2, Parcel::all()->count());
  }


   /** @test */
   public function check_display_all_parcels_work_with_ok_status_empty_data()
   {
     $sender = User::factory()->create([
       'type' => UserType::Sender()
     ]);
 
     $response = $this->actingAs($sender)->get('orders');
     $response->assertStatus(403);
   }
  }

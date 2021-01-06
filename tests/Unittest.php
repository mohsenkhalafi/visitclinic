<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Unittest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Laravel 5')
            ->dontSee('Rails');
    }
    public function testpage()
    {
        $this->visit('addtimesho')
            ->click('addtime')
            ->seePageIs('addtimesho');
    }
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('rahimi', 'name')
            ->radio('table')
            ->press('Register')
            ->seePageIs('/index');
    }
    public function testPhotoUploaded()
    {
        $this->visit('upload')
            ->type('File Name', 'name')
            ->attach('uploads/photos/', 'image')
            ->press('Upload')
            ->see('Upload Successful!');
    }
    public function testJson()
    {
        $this->json('POST', '/user', ['name' => 'زهرا'])
            ->seeJson([
                'created' => true,
            ]);
    }
    public function testApplication()
    {
        $this->withSession(['table' => 'patient'])
            ->visit('index');
    }

    public function Sessionstate()
    {
        $user = factory(App\LoginController::class)->authenticate();

        $this->actingAs($user)
            ->withSession(['state' => 'yes'])
            ->visit('index')
            ->see('خوش آمدید, '.$user->fname.$user->lname);
    }
    public function Response()
    {
        $response = $this->call('GET', 'admin');
        $this->assertEquals(200, $response->login());
    }
    public function testDatabase()
    {

        $this->seeInDatabase('patient', ['email' => 'mh3n.email@gmail.com']);
    }

    public function testUserRelationIsTrue(){
        $user = new User();
        $user->patient = 'testusername';
        $user->save();
        $this->assertEquals($user->id, $user->schedule->patientid);
    }

    public function Emailsend()
    {

        Mail::raw('لغو حضور دکتر',function($message) {
            $message = to('mh3n.email@gmail.com');
            $message = from('laravelmail.darmangah@gmail.com');
        });
    }
}

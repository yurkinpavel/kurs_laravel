<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;
;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_a_onenews_view_can_be_rendered()
    {
        $news = array();
        $news['title'] = 'Мобилизация женщин';
        $news['text'] = 'Российские феминистки требуют мобилизации женщин наравне с мужчинами';
        $news['is_private'] = false;
        $view = $this->view('news.one', ['news' => $news]);
        $view->assertSee('Мобилизация женщин');
    }


    public function test_a_categories_view_can_be_rendered()
    {
        $categories = array();
        $categories_news = array();
        $categories_newss['id'] = 1;
        $categories_news['title'] = 'Общество';
        $categories_news['slug'] = 'obshestvo';
        $categories[] = $categories_news;
        $view = $this->view('news.categories', ['categories' => $categories]);
        $view->assertSee('Общество');
    }


    public function test_a_news_view_can_be_rendered()
    {
        $news_all = array();
        $news['id'] = 1;
        $news['title'] = 'Мобилизация женщин';
        $news['text'] = 'Российские феминистки требуют мобилизации женщин наравне с мужчинами';
        $news['is_private'] = false;
        $news_all[] = $news;
        $view = $this->view('news.index', ['news' => $news_all]);
        $view->assertSee('Мобилизация женщин');
    }

    public function test_adminka()
    {
        $response = $this->get('/adminka');
        $response->assertStatus(200);
    }

    public function test_create_page()
    {
        $response = $this->get('/adminka/create');
        $response
        ->assertStatus(200)
        ->assertSee('Общество');
    }

    public function test_about_page()
    {
        $response = $this->get('/about');
        $response
        ->assertStatus(200)
        ->assertSee('О тестовом проекте');
    }

    public function test_404_page()
    {
        $response = $this->get('/blablabla');
        $response
        ->assertStatus(200)
        ->assertSee('404');// статус конечно должен быть 404
    }


    public function test_download_img()
    {
       $response = $this->get('/adminka/page3');
       $response->assertDownload('1.jpg');
    }

     


}

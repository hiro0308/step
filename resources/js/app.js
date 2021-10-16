/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
//
// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './bootstrap'
import Vue from 'vue'
// お気に入り登録
import ArticleLike from './components/ArticleLike'

const app = new Vue({
    el: '#app',
    components: {
      ArticleLike,
    }
});

$(function() {
  //メッセージ表示
  var $jsShowMsg = $('.js-show-msg');
  var msg = $jsShowMsg.text();
  if(msg.replace(/^[\s　]+|[\s　]+$/g, "").length){
    $jsShowMsg.slideToggle('slow');
    setTimeout(function(){ $jsShowMsg.slideToggle('slow'); }, 5000);
  }
  //sp用メニュー
  $('.js-toggle-sp-menu').on('click', function() {
    $(this).toggleClass('active');
    $('.js-toggle-sp-menu-target').toggleClass('active');
  });
  //項目がクリックされたら閉じる
  $('.js-toggle-sp-menu-target a').on('click', function() {
    $('.js-toggle-sp-menu').trigger('click');
  });
  //項目以外がクリックされたら閉じる
  $('.js-toggle-sp-menu-target').on('click', function() {
    $('.js-toggle-sp-menu').trigger('click');
  });
  //画像プレビュー
  var $fileInput = $('.js-prev-target');
  var $filePrev = $('.js-prev');
  $fileInput.on('change', function(e) {
    var file = this.files[0],
        fileReader = new FileReader();
    fileReader.onload = function(e) {
      $filePrev.attr('src', e.target.result);
    };
    fileReader.readAsDataURL(file);"{{ old('title') }}"
  });
  //モーダルウィンドウ
  $('.js-modal-open').on('click', function() {
    $('.js-show-open-target').fadeIn(300);
  });
  
  $('.js-modal-close').on('click', function() {
    $('.js-show-open-target').fadeOut(300);
  });
});

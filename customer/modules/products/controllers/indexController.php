<?php

function construct() {
    load_model('index');
    load_model('all');
    load('helper', 'pagging');
}

function indexAction() {
    load_view('index');
}

function allAction() {
    load_view('all-cat');
}

function detailAction() {
    load_view('detail-product');
}



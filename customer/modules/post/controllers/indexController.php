<?php

function construct() {
    load_model('index');
    load('helper', 'pagging');
}

function indexAction() {
    load_view('index');
}

function detailAction() {
    $id = $_GET['id'];
    load_view('detail');
}

function addAction() {
    
}


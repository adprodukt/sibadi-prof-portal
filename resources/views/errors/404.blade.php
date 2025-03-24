@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', $exception->getStatusCode())
@section('message', $exception->getMessage())

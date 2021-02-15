@extends('user.layout.home')
@section('SiteTitle','Home || Riskory')
@section('content')
<style>
html,body {
    min-height: 100%;
    height: 100%;
}
.cover-container {
    height: 100%;
}
</style>
<main role="main" class="inner cover my-auto">
    <div class="container">
        <div class="row align-items-center my-5">
            <div class="col-12 col-sm-12 col-md-5">
                <img src="assets/images/Riskory-1-1.png" width="100%" class="logo-body">
                <div>
                    <p class="tagline">Every Risk Has a Story</p>
                    <p class="p-style">A comprehensive library of Risk Controls, contributed by audit and risk managers like YOU, and categorized by Industry, Business Process, Framework and Tags.</p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7">
                <img src="assets/images/group-16.svg" width="100%">
            </div>
        </div>
    </div>
</main>
@endsection
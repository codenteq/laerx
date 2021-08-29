@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Derslerim</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Derslerim</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <nav>
                        <div class="nav nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button style="width: 25%" class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">İlk Yardım
                            </button>
                            <button style="width: 25%" class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Trafik ve Çevre
                            </button>
                            <button style="width: 25%" class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">Araç Tekniği
                            </button>
                            <button style="width: 25%" class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings" type="button" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">Trafik Adabı
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                                <table id="data-table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Başlık</th>
                                        <th scope="col">Derse Gir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">İlk yardım kategorisi</th>
                                        <td>
                                            <a href="#">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                                <table id="data-table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Başlık</th>
                                        <th scope="col">Derse Gir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Trafik ve Çevre kategorisi</th>
                                        <td>
                                            <a href="#">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                             aria-labelledby="v-pills-messages-tab">
                            <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                                <table id="data-table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Başlık</th>
                                        <th scope="col">Derse Gir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Araç Tekniği kategorisi</th>
                                        <td>
                                            <a href="#">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                             aria-labelledby="v-pills-settings-tab">
                            <div class="col-12 col-lg-12 mt-3 overflow-scroll">
                                <table id="data-table" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Başlık</th>
                                        <th scope="col">Derse Gir</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Trafik ve Adap kategorisi</th>
                                        <td>
                                            <a href="#">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Derslerim</title>

@endsection

@section('css')
    @include('layouts.stylesheet')
@endsection

@section('js')
    @include('layouts.script')
@endsection


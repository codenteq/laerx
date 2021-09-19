@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Canlı Ders Ekle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.live-lesson.index')}}">Canlı Dersler</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Canlı Ders Ekle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" name="live_date" placeholder="Tarih">
                            <label for="floatingFirst">Tarih</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Üye Adı">
                            <label for="floatingFirst">Ders Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="url" placeholder="Ders Link">
                            <label for="floatingFirst">Ders Link</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="periodId" aria-label="Floating label select example">
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dönem</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="monthId" aria-label="Floating label select example">
                                @foreach($months as $month)
                                    <option value="{{$month->id}}">{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Ay</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="groupId" aria-label="Floating label select example">
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Grup</label>
                        </div>

                        <br>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="flexSwitchCheckChecked"
                                   checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Kursiyere bildirim
                                Aktif/Pasif</label>
                        </div>

                        <br>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.live-lesson.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Canlı Ders Ekle</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('manager.live-lesson.store')}}';
        const backUrl = '{{route('manager.live-lesson.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

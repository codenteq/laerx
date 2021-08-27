@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Canlı Ders Düzenle</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.live-lesson.index')}}">Canlı Dersler</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Canlı Ders Düzenle</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="datetime-local" class="form-control" name="live_date" placeholder="Tarih"
                                   value="{{\Carbon\Carbon::parse($live_lesson->live_date)->format("Y-m-d\TH:i:s")}}">
                            <label for="floatingFirst">Tarih </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Üye Adı"
                                   value="{{$live_lesson->title}}">
                            <label for="floatingFirst">Ders Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="url" placeholder="Ders Link"
                                   value="{{$live_lesson->url}}">
                            <label for="floatingFirst">Ders Link</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($types as $type)
                                    <option
                                        value="{{$type->id}}" {{$live_lesson->typeId == $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="periodId" aria-label="Floating label select example">
                                @foreach($periods as $period)
                                    <option
                                        value="{{$period->id}}" {{$live_lesson->periodId == $period->id ? 'selected' : null}}>{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Dönem</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="monthId" aria-label="Floating label select example">
                                @foreach($months as $month)
                                    <option
                                        value="{{$month->id}}" {{$live_lesson->monthId == $month->id ? 'selected' : null}}>{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Ay</label>
                        </div>

                        <br>

                        <div class="form-floating">
                            <select class="form-select" name="groupId" aria-label="Floating label select example">
                                @foreach($groups as $group)
                                    <option
                                        value="{{$group->id}}" {{$live_lesson->groupId == $group->id ? 'selected' : null}}>{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Grup</label>
                        </div>

                        <br>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked"
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

    <title>Canlı Ders Düzenle</title>

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
        const actionUrl = '{{route('manager.live-lesson.update',$live_lesson)}}';
        const backUrl = '{{route('manager.live-lesson.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection

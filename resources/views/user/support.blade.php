@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>{{__('user/menu.support')}}</h2>
                </blockquote>
            </figure>
            <div class="row">
                <form class="p-5" name="form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingWhy" name="subject" placeholder="İletişim Nedeniniz?">
                        <label for="floatingWhy">{{__('user/support.contact_why')}}</label>
                    </div>

                    <div class="form-floating">
                            <textarea class="form-control" placeholder="Mesajınız" name="message" id="floatingTextarea"
                                      style="height: 100px"></textarea>
                        <label for="floatingTextarea">{{__('user/support.message')}}</label>
                    </div>

                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">{{__('user/support.send_btn')}}</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@section('meta')
    <title>{{__('user/menu.support')}}</title>
@endsection

@section('css')
    @include('partials.stylesheet')
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('user.support.store')}}';
        const backUrl = '{{route('user.support')}}';
    </script>
    @include('partials.script')
@endsection



<div class="modal fade" id="createAppointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Randevu Alma Formu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <select class="form-select" name="teacherId" aria-label="Floating label select example">
                            <option disabled selected>Seçiniz</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name .' '. $teacher->surname}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Eğitmen</label>
                    </div>

                    <br>

                    <div class="form-floating">
                        <select class="form-select" name="carId" aria-label="Floating label select example">
                            <option disabled selected>Seçiniz</option>
                            @foreach($cars as $car)
                                <option value="{{$car->id}}">{{$car->plate_code}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Araç</label>
                    </div>

                    <br>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="date" placeholder="Tarih"
                               min="{{\Carbon\Carbon::now()->toDateString()}}">
                        <label for="floatingAddress">Tarih</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Randevu Oluştur
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

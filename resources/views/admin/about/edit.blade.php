@extends('layouts.app')

@section('title', 'Hakkımda Sayfasını Düzenle')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Hakkımda Sayfasını Düzenle</h5>
                    </div>

                    <div class="card-body">
                        <!-- Özgeçmiş Bölümü -->
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-3">Özgeçmişim</h6>
                            <div class="mb-3">
                                <textarea class="form-control" id="biography" rows="6">{{ $about->biography ?? '' }}</textarea>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" onclick="updateBiography()">Özgeçmişi Güncelle</button>
                            </div>
                        </div>

                        <hr>

                        <!-- Hobiler Bölümü -->
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-3">Hobilerim</h6>
                            <div class="mb-3">
                                <div id="hobbiesList" class="d-flex flex-wrap gap-2 mb-3">
                                    @if(isset($about) && $about->hobbies)
                                        @foreach($about->hobbies as $index => $hobby)
                                            <div class="d-flex align-items-center me-2 mb-2">
                                                <span class="me-2">{{ $hobby }}</span>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeHobby({{ $index }})">Sil</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="newHobby" placeholder="Yeni hobi ekle">
                                    <button class="btn btn-success" type="button" onclick="addHobby()">Ekle</button>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Fobiler Bölümü -->
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-3">Fobilerim</h6>
                            <div class="mb-3">
                                <div id="phobiasList" class="d-flex flex-wrap gap-2 mb-3">
                                    @if(isset($about) && $about->phobias)
                                        @foreach($about->phobias as $index => $phobia)
                                            <div class="d-flex align-items-center me-2 mb-2">
                                                <span class="me-2">{{ $phobia }}</span>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removePhobia({{ $index }})">Sil</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="newPhobia" placeholder="Yeni fobi ekle">
                                    <button class="btn btn-success" type="button" onclick="addPhobia()">Ekle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        let editor;

        ClassicEditor
            .create(document.querySelector('#biography'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        function updateBiography() {
            const biography = editor.getData();
            console.log(biography)

            fetch('{{ route('admin.about.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    biography: biography,
                    _token: '{{ csrf_token() }}'
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                    } else {
                        alert('Bir hata oluştu');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Bir hata oluştu');
                });
        }

        function addHobby() {
            const input = document.getElementById('newHobby');
            const hobby = input.value.trim();

            if (hobby) {
                fetch('{{ route('admin.about.hobby.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ hobby })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateHobbiesList(data.hobbies);
                            input.value = '';
                        }
                    });
            }
        }

        function removeHobby(index) {
            fetch(`{{ url('admin/about/hobby') }}/${index}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateHobbiesList(data.hobbies);
                    }
                });
        }

        function updateHobbiesList(hobbies) {
            const list = document.getElementById('hobbiesList');
            if (!list) return;

            list.innerHTML = '';  // Önce listeyi temizle
            hobbies.forEach((hobby, index) => {
                list.innerHTML += `
            <div class="d-flex align-items-center me-2 mb-2">
                <span class="me-2">${hobby}</span>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeHobby(${index})">Sil</button>
            </div>
        `;
            });
        }

        function addPhobia() {
            const input = document.getElementById('newPhobia');
            const phobia = input.value.trim();

            if (phobia) {
                fetch('{{ route('admin.about.phobia.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ phobia })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updatePhobiasList(data.phobias);
                            input.value = '';
                        }
                    });
            }
        }

        function removePhobia(index) {
            fetch(`{{ url('admin/about/phobia') }}/${index}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updatePhobiasList(data.phobias);
                    }
                });
        }

        function updatePhobiasList(phobias) {
            const list = document.getElementById('phobiasList');
            if (!list) return;

            list.innerHTML = '';  // Önce listeyi temizle
            phobias.forEach((phobia, index) => {
                list.innerHTML += `
            <div class="d-flex align-items-center me-2 mb-2">
                <span class="me-2">${phobia}</span>
                <button type="button" class="btn btn-danger btn-sm" onclick="removePhobia(${index})">Sil</button>
            </div>
        `;
            });
        }
    </script>
@endpush

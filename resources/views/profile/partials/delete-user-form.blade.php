<section>
    <header>
        <h5 class="fw-bold text-danger mb-1">{{ __('Hapus Akun') }}</h5>
        <p class="text-danger small mb-4 opacity-75">
            {{ __('Aksi ini permanen. Semua data akun akan dihapus dan tidak dapat dikembalikan.') }}
        </p>
    </header>

    <!-- Bootstrap Modal Button -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Hapus Akun') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true" {{ $errors->userDeletion->isNotEmpty() ? 'data-bs-show="true"' : '' }}>
        <div class="modal-dialog">
            <div class="modal-content bg-dark border-secondary">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title text-white" id="confirmUserDeletionModalLabel">{{ __('Yakin ingin menghapus akun?') }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <p class="text-white-50 small mb-4">
                            {{ __('Masukkan password Anda untuk mengonfirmasi penghapusan akun secara permanen.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label text-white-50">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password" class="form-control bg-dark text-white border-secondary" placeholder="{{ __('Password') }}">
                            @if($errors->userDeletion->get('password'))
                                <div class="text-danger small mt-1">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">{{ __('Batal') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Hapus Akun') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @if($errors->userDeletion->isNotEmpty())
        <!-- If there are errors, ensure the modal opens automatically -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('confirmUserDeletionModal'));
                myModal.show();
            });
        </script>
    @endif
</section>

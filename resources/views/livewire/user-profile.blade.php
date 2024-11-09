<div>
    <div class="personal-info">
        <p class="account-title">{{__('common.personal_info')}}</p>
        <div class="mini-profile d-flex">
            <img src="" alt="">
            {{-- <div class="acc-img"></div> --}}
            <div class="acc-text">

                <p class="acc-name">{{ auth()->user()->name }}</p>
                <p class="acc-name">{{ auth()->user()->email }}</p>
                <p class="acc-name">{{ __('common.Location') }}: <span class="acc-btn"  data-bs-toggle="modal" data-bs-target="#locationModal">
                    @if( auth()->user()->location_id > 0 ) 
                        @if ( session('locale') == 'ru' or session('locale') == '' )
                            {{ auth()->user()->location->title . ' ' . auth()->user()->location->subj }} 
                        @else
                            {{ auth()->user()->location->title_en }} 
                        @endif
                    @else 
                        {{ __('common.Not selected') }} 
                    @endif </span></p>
                <div class="acc-btn" wire:click="editProfile">{{__('common.change_profile')}}</div>
                <div class="acc-btn" wire:click="resetPassword">{{__('common.change_password')}}</div>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"class="acc-btn">{{__('common.quit')}}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" wire:ignore.self id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true" style="width:100%">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content acc-modal-content">
                <div class="modal-header">
                    <h5 class="modal-title account-title" id="editProfileLabel">{{__('common.change_profile')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="saveProfile">
                    @csrf
                    <div class="modal-body">
                        <input type="file" wire:model="avatar" id="avatarInput" style="display: none;">
                        <p class="modal-p">{{__('common.your_name')}}</p>
                        <input type="text" wire:model="user_name" class="mb-35 modal-input">
                        @error('user_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary register-btn">
                            <div class="d-flex">
                                <p class="register-btn-p">{{__('common.save')}}</p>
                                <i class="fa-light fa-chevron-right my-auto"></i>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" wire:ignore.self id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel"
        aria-hidden="true" style="width:100%">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content acc-modal-content">
                <div class="modal-header">
                    <h5 class="modal-title account-title" id="resetModalLabel">{{__('common.change_password')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="savePassword">
                    @csrf
                    <div class="modal-body">
                        <input type="file" wire:model="avatar" id="avatarInput" style="display: none;">
                        <p class="modal-p">{{__('common.new_password')}}</p>
                        <input type="text" class="mb-35 modal-input">
                        <p class="modal-p">{{__('common.repeat_password')}}</p>
                        <input type="text" class="mb-35 modal-input">
                        {{-- @error('user_name')
                            <span>{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary register-btn">
                            <div class="d-flex">
                                <p class="register-btn-p">{{__('common.save')}}</p>
                                <i class="fa-light fa-chevron-right my-auto"></i>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('page-script')
        <script>
            Livewire.on('selectFile', () => {
                document.getElementById('avatarInput').click();
            });

            function showEditModal() {
                var editModal = document.getElementById('editModal');
                var modalInstance = bootstrap.Modal.getInstance(editModal);
                if (modalInstance) {
                    modalInstance.show();
                } else {
                    modalInstance = new bootstrap.Modal(editModal);
                    modalInstance.show();
                }
            }

            function closeEditModal() {
                var editModal = document.getElementById('editModal');
                var modalInstance = bootstrap.Modal.getInstance(editModal);
                modalInstance.hide();
            }

            function showResetModal() {
                var resetModal = document.getElementById('resetModal');
                var modalInstance = bootstrap.Modal.getInstance(resetModal);
                if (modalInstance) {
                    modalInstance.show();
                } else {
                    modalInstance = new bootstrap.Modal(resetModal);
                    modalInstance.show();
                }
            }

            function closeResetModal() {
                var resetModal = document.getElementById('resetModal');
                var modalInstance = bootstrap.Modal.getInstance(resetModal);
                modalInstance.hide();
            }

            document.addEventListener('DOMContentLoaded', function() {
                window.addEventListener('show-edit-modal', event => {
                    showEditModal();
                });
                window.addEventListener('close-edit-modal', event => {
                    closeEditModal();
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                window.addEventListener('show-reset-modal', event => {
                    showResetModal();
                });
                window.addEventListener('close-reset-modal', event => {
                    closeResetModal();
                });
            });
            
        </script>
    @endsection
</div>

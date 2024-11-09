<div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="request-button" wire:click="showApplyModal">
            <p>{{__('common.leave_a_request')}}</p>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade right" wire:ignore.self id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <p class="request-modal-title">{{__('common.order_a_composition')}}</p>
                    <button type="button" class="btn-close" wire:click="closeApplyModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addApply" enctype="multipart/form-data" method="POST">
                        <p class="modal-p">{{__('common.duration')}}</p>
                        <input type="text" placeholder="{{ __('common.need_dur') }}" class="mb-35 modal-input"
                            name="apply_duration" id="apply_duration" wire:model="apply_duration">
                        @error('apply_duration')
                            <span>{{ $message }}</span>
                        @enderror
                        <p class="modal-p">{{__('common.beep')}}</p>
                        @error('apply_beep')
                            <span>{{ $message }}</span>
                        @enderror
                        {{-- <div class="d-flex mb-35">
                            <input type="radio" id="beep_yes" name="apply_beep" class="custom-control-input"
                                wire:model="apply_beep" value="no">
                            <label class="custom-control-label mr-4" for="beep_yes">{{__('common.yes')}}</label>
                            <input type="radio" id="beep_no" name="apply_beep" class="custom-control-input"
                                wire:model="apply_beep" value="yes">
                            <label class="custom-control-label" for="beep_no">{{__('common.no')}}</label>
                        </div> --}}
                        <div class="d-flex mb-35">
                            <input type="radio" id="beep_yes" name="apply_beep" class="custom-control-input form-check-input"  wire:model="apply_beep" value="no">
                            <label class="custom-control-label form-check-label mr-4" for="beep_yes">{{__('common.yes')}}</label>
                            <input type="radio" id="beep_no" name="apply_beep" class="custom-control-input form-check-input" wire:model="apply_beep" value="yes">
                            <label class="custom-control-label form-check-label " for="beep_no">{{__('common.no')}}</label>
                        </div>
                        <p class="modal-p">{{__('common.parts_of_song')}}</p>
                        <textarea name="apply_description" id="apply_description" cols="30" rows="3"
                            placeholder="{{ __('common.parts_of_song_plch') }}" wire:model="apply_description" class="mb-35 modal-input"></textarea>
                        @error('apply_description')
                            <span>{{ $message }}</span>
                        @enderror
                        <p class="modal-p">{{__('common.attach_music')}}</p>
                        <label for="file" class="attach-btn mb-35">{{__('common.upload_a_file')}}</label>
                        <!-- Hidden file input -->
                        {{-- <input type="file" id="file" wire:model="file" accept="audio/*" hidden> --}}
                        <input type="file" id="file" wire:model="file" hidden>
                        @if ($file)
                        <audio src="{{$file->temporaryUrl()}}"></audio>
                            {{-- <p>{{ $file->temporaryUrl() }}</p> --}}
                            <p>Файл выбран</p>
                        @endif
                        @error('file')
                            <span>{{ $message }}</span>
                        @enderror
                        <ul id="fileList"></ul>
                        <p class="modal-p">{{__('common.your_name')}}</p>
                        <input type="text" placeholder="{{ __('common.your_name') }}" class="mb-35 modal-input" name="apply_name"
                            id="apply_name" wire:model="apply_name">
                        @error('apply_name')
                            <span>{{ $message }}</span>
                        @enderror
                        <p class="modal-p">{{__('common.contact_you')}}</p>
                        <input type="text" placeholder="+7999 111 2233" class="mb-35 modal-input"
                            name="apply_contact" id="apply_contact" wire:model="apply_contact">
                        @error('apply_contact')
                            <span>{{ $message }}</span>
                        @enderror
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                        <button type="submit" class="request-modal-btn mb-35">
                            <p>{{__('common.leave_a_request')}}1111</p>
                        </button>
                        <p class="acceptance">{{__('common.agreement')}}<a href="/privacy">{{__('common.agreement_1')}}</a> </p>
                    </form>
                    {{-- <button wire:click="sendMail">Нtвидимая ни для кого кнопка отправки письма</button> --}}
                </div>
            </div>
        </div>
    </div>

    @section('page-script')
        <script>
            function showApplyModal() {
                var applyModal = document.getElementById('applyModal');
                var modalInstance = bootstrap.Modal.getInstance(applyModal);
                if (modalInstance) {
                    modalInstance.show();
                } else {
                    modalInstance = new bootstrap.Modal(applyModal);
                    modalInstance.show();
                }
            }

            function closeApplyModal() {
                var applyModal = document.getElementById('applyModal');
                var modalInstance = bootstrap.Modal.getInstance(applyModal);
                modalInstance.hide();
            }

            document.addEventListener('DOMContentLoaded', function() {
                window.addEventListener('show-apply-modal', event => {
                    showApplyModal();
                });
                window.addEventListener('close-apply-modal', event => {
                    closeApplyModal();
                });
            });
        </script>
    @endsection
</div>

@extends('layouts.admin')
@section('title')
    <h3>Заявки на компоновку</h3>
@endsection


@section('page')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Контакт</th>
                <th scope="col">Описание</th>
                <th colspan="2" style="align-items: center">Действия</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($all as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->contact }}</td>
                    <td>{{ $item->duration }} </td>
                    <td>
                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#applyModal{{ $item->id }}">
                            <i class="fa-light fa-eye" style="font-size:18px;margin-right:10px; color:#ff7472"></i>
                        </button>

                        <a href="" class="no-margin"></a>
                    </td>

                </tr>
            @empty
                <p>Заявки отсутствуют</p>
            @endforelse
        </tbody>
    </table>
    @foreach ($all as $item)
        <div class="modal fade" id="applyModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="applyModal{{ $item->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModal{{ $item->id }}Label">Просмотр заявки</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>
                                            Продолжительность:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $item->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Пользователь:
                                        </strong>
                                    </td>
                                    <td>
                                        @if ($item->user_id == null)
                                            Аноним
                                        @else
                                            {{ $item->user->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Имя:
                                        </strong>
                                    </td>
                                    <td>{{ $item->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Нужен ли beep:
                                        </strong>
                                    </td>
                                    <td>
                                        @if ($item->beep)
                                            Да
                                        @else
                                            Нет
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Прикрепленный файл:
                                        </strong>
                                    </td>
                                    <td>
                                        @if ($item->file)
                                            <a href="{{ asset(str_replace('public', 'storage', $item->file)) }}"
                                                target="download">
                                                Скачать
                                            </a>
                                        @else
                                            Нет
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Описание:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Контакт:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $item->contact }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Скрыть</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

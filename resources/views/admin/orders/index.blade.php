@extends('layouts.admin')
@section('title')
    <h3>Заказы пользователей</h3>
@endsection


@section('page')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Телефон</th>
                <th scope="col">Регион</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дата</th>
                <th scope="col">Статус</th>
                <th colspan="2" style="align-items: center">Действия</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($all as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ @$item->location->title }}</td>
                    <td>{{ $item->total }} </td>
                    <td>{{ $item->created_at->format('d.m.Y') }} г.</td>
                    <td>@if ( $item->status == 1) <span style="color:green">Оплачено</span> @else <span style="color:red;white-space: nowrap">Не оплачено</span> @endif</td>
                    <td>
                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#applyModal{{ $item->id }}">
                            <i class="fa-light fa-eye" style="font-size:18px;margin-right:10px; color:#ff7472"></i>
                        </button>

                        <a href="" class="no-margin"></a>
                    </td>

                </tr>
            @empty
                <p>Заказы отсутствуют</p>
            @endforelse
        </tbody>
    </table>
    @foreach ($all as $item)
        <div class="modal fade" id="applyModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="applyModal{{ $item->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModal{{ $item->id }}Label">Просмотр заказа</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>
                                            Имя:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Email:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Телефон:
                                        </strong>
                                    </td>
                                    <td>{{ $item->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Регион:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ @$item->location->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            Сумма:
                                        </strong>
                                    </td>
                                    <td>
                                        {{ $item->total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Трек</th>
                                    <th scope="col">Стоимость</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->tracks as $otrack)
                                @php
                                    $track = $otrack->trackObj;
                                @endphp
                                    <tr>
                                        <td>{{ $track->name_ru }}</td>
                                        <td>{{ $track->price }}</td>
                                    </tr>
                                @empty
                                    <p></p>
                                @endforelse
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

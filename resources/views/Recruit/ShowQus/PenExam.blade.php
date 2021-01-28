@extends('layouts.Recruit.penQus.penQus')

@section('title', '青春在线笔试系统')
@section('inlineStyle')
  @parent
    <style>
        p, span, h2, h5, li {
            user-select: none;
        }
        p {
            margin-bottom: 0.5rem;
        }
        li {
            padding: 5px !important;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.95);
        }
        .card-title {
            margin-bottom: 0rem !important;
        }
    </style>
@endsection
@section('mainInfor', '青春在线笔试系统')

@section('mainCont')
  @parent
    <div class="card bg-light text-dark">
        <div class="card-body row d-flex justify-content-around">
            <div>
                <span class="font-weight-bold text-muted">笔试部门：</span>
                <li class="list-group-item list-group-item-light d-inline rounded">{{ $department }}</li>
            </div>
            <div>
                <span class="font-weight-bold text-muted">所属届次：</span>
                <li class="list-group-item list-group-item-light d-inline rounded">{{ $userPeriod }}</li>
            </div>
            <div>
                <span class="font-weight-bold text-muted">参试成员：</span>
                <li class="list-group-item list-group-item-light d-inline rounded">{{ $userName }}</li>
            </div>
        </div>
    </div>
    <form action="/recruit/exam/submit" method="POST">
        @csrf
        @if(!empty($sgSelDt))
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold text-muted">单项选择题</h5>
                </div>
                <div class="card-body">
                    @foreach ($sgSelDt as $key => $value)
                        <div class="mb-3">
                            <p class="text-secondary font-weight-bold">
                                <span class="badge badge-pill badge-secondary">
                                    {{ ($key + 1) . '、'}}
                                </span>
                                {{ $value['qus_content'] }}
                            </p>    
                            <div class="ml-4">
                                @foreach ($value['qus_sel'] as $ke => $val)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="{{"sgSel" . $val['qus_selid']}}" name="{{ 'sgSel' . $value['qus_id'] }}" value="{{ 'sel' . $val['qus_selid'] }}" required>
                                            <label class="custom-control-label text-secondary" for="{{"sgSel" . $val['qus_selid']}}">
                                                {{ $val['qus_selct'] }}
                                            </label>
                                        </div>
                                @endforeach
                        </div>
                        </div>
                    @endforeach
                </div> 
            </div>
        @endif
        @if (!empty($mtSelDt))
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold text-muted">多项选择题</h5>
                </div>
                <div class="card-body">
                    @foreach ($mtSelDt as $key => $value)
                        <div class="mb-3">
                            <p class="text-secondary font-weight-bold">
                                <span class="badge badge-pill badge-secondary">
                                    {{ ($key + 1) . '、'}}
                                </span>
                                {{ $value['qus_content'] }}
                            </p>
                            <div class="ml-4">
                                @foreach ($value['qus_sel'] as $ke => $val)
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="{{"mtSel" . $val['qus_selid']}}" name="{{"mtSel" . $value['qus_id'] . '[]'}}" value="{{ 'sel' . $val['qus_selid'] }}">
                                        <label class="custom-control-label text-secondary" for="{{"mtSel" . $val['qus_selid']}}">
                                            {{ $val['qus_selct'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach    
                </div> 
            </div>
        @endif
        @if ($gpFilDt != null)
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold text-muted">填空题</h5>
                </div>
                <div class="card-body">
                    @foreach ($gpFilDt as $key => $value)
                        <div class="mb-4">
                            <span class="text-secondary font-weight-bold inline-block">
                                <span class="badge badge-pill badge-secondary">
                                    {{ ($key + 1) . '、'}}
                                </span>
                                {{ $value['gpFtPtn'] }}
                                <input class="bg-info bg-light text-dark d-inline" style="width:110px" type="text" class="form-control" name={{"gpFil" . $value['id']}} id="{{'sel' . $key . 'Qus' }}" placeholder="请填入答案">
                                {{ $value['gpEdPtn'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if ($skTchDt !== null)
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold text-muted">简述题</h5>
                </div>
                <div class="card-body">
                    @foreach($skTchDt as $key => $value)
                        <p class="text-secondary font-weight-bold">
                            <span class="badge badge-pill badge-secondary">
                                {{ ($key + 1) . '、'}}
                            </span>
                            {{ $value['qus_content'] }}
                        </p>
                        <div class="form-group">
                            <textarea class="form-control" rows="2" id="comment" name={{ "skTch" . $value['id']}} placeholder="请在此陈述你的观点" required></textarea>
                        </div>
                    @endforeach    
                </div> 
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-body text-center">
                <input type="text" name="userId" value="{{ $userId }}" hidden>
                <input type="text" name="gpId" value="{{ $gpId }}" hidden>
                <button type="submit" class="btn btn-primary">一键交卷</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
  @parent
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
@endsection
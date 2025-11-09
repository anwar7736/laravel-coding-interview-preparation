@extends('layouts.app')
@section('title', __('SQL Execution'))

@section('content')
    <!-- Main content -->
    <section class="container-fluid">
        {{-- @component('components.widget', ['class' => 'box-primary', 'title' => __('Execute Your SQL Query')]) --}}
        <div class="row">
            <div class="col-md-6">
                <form id="sqlForm" method="POST" action="{{ route('sql_execute.execute') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">SQL Query</label>
                        <textarea name="query" id="query" class="form-control" rows="7" required></textarea>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Execute</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">SQL Result</label>
                    <textarea readonly name="result" id="result" class="form-control" style="background-color:rgb(241, 244, 244);"
                        rows="7" required></textarea>
                </div>
                <div class="mt-5">
                    {{-- <button type="button" class="btn btn-secondary">Clear</button> --}}
                </div>
                </form>
            </div>
        </div>
        {{-- @endcomponent --}}

        <div class="modal fade unit_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->

@endsection

@section('javascript')
    <script>
        $("#sqlForm").submit(function(e) {
            e.preventDefault();
            const $this = $(this);
            toastr.clear();
            $this.find('button').attr('disabled', true);
            const data = new FormData($this[0]);

            const method = $this.attr('method');
            const url = $this.attr('action');
            if ($.trim(data.get('query')) !== '') {
                $.ajax({
                    method,
                    url,
                    data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $this.find('button').attr('disabled', false);
                        if (res.success) {
                            $("#sqlForm")[0].reset();
                            $('#result').text(res.data);
                            toastr.success(res.message);
                        } else {
                            $('#result').text(res.data);
                            toastr.error(res.message);
                        }
                    }
                });
            }




        });
    </script>
@endsection

<div class="content" style="min-height: 0; padding-top: 0; padding-bottom: 0; position: relative;">
    <div class="system-alerts">
        @if(isset($errors) and count($errors) > 0)
            @if(is_string($errors))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{ $errors }}
                </div>
            @else
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <strong>Erro!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Aviso!</strong> {!! session('error') !!}
                <?php session()->forget('error'); ?>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Aviso!</strong> {!! session('success') !!}
                <?php session()->forget('success'); ?>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Aviso!</strong> {!! session('info') !!}
                <?php session()->forget('info'); ?>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Aviso!</strong> {!! session('warning') !!}
                <?php session()->forget('warning'); ?>
            </div>
        @endif
        @if(session('aviso_do_programador'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Aviso!</strong> {!! session('aviso_do_programador') !!}
                <?php session()->forget('aviso_do_programador'); ?>
            </div>
        @endif
    </div>
</div>
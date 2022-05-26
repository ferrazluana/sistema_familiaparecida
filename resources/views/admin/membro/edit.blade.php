@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.membro.actions.edit', ['name' => $membro->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <membro-form
                :action="'{{ $membro->resource_url }}'"
                :data="{{ $membro->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.membro.actions.edit', ['name' => $membro->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.membro.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </membro-form>

        </div>
    
</div>

@endsection
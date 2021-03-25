<span class="label 
{{$level=='manager'   ?'label-info':''}}
{{$level=='accountant' ?'label-primary':''}}
{{$level=='customer_service'?'label-success':''}}
{{$level=='delivery'?'label-danger':''}}
{{$level=='technical_support'?'label-warning':''}}
{{$level=='sales_man'?'label-success':''}}
">
    {{ trans('admin.'.$level) }}
</span>
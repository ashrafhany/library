<div class="panel panel-default">
    <div class="panel-heading text-center">{{ __('categories') }}</div>
               
        <div class="panel-body">
            @if(count($allcategories)>0)
                <ul class="nav-link">
                    @foreach($allcategories as $category)
                        <li><a href="{{route('category',$category->id)}}">{{$category->name}}</a></li>    
                    @endforeach    
                </ul>
            @endif        
    </div>
</div>    
    
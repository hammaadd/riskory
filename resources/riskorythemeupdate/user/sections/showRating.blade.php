@for($i=1;$i<=5;$i++)
<span class=" 
    @if($rc->ratings->avg('rating')> $i-1 && $rc->ratings->avg('rating') < $i)
    fa fa-star-half-alt 
    @endif
    @if($i<=$rc->ratings->avg('rating'))
    fa fa-star checked
    @else
    far fa-star
    @endif 
    do-rating" >
                                        </span>
@endfor
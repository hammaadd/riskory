<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Posted On</th>
        <th>Posted By</th>
        <th>Title</th>
        <th>Objective</th>
        <th>Description</th>
        <th>Frequency</th>
        <th>Industries</th>
        <th>Processes</th>
        <th>Frameworks</th>
        <th>Tags</th>
        <th>Business Impact</th>
        <th>Procedure</th>
        <th>Likes</th>
        <th>Dislikes</th>
        <th>Views</th>
        <th>Bookmarks</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lists as $ls)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ls->rc->created_at}}</td>
            <td>{{$ls->rc->user->name}}</td>
            <td>{{$ls->rc->title}}</td>
            <td>{{$ls->rc->objective}}</td>
            <td>{{$ls->rc->description}}</td>
            <td>{{$ls->rc->frequency}}</td>
            <?php $industries = $ls->rc->controls->where('type','industry');?>
            <td>
                @foreach($industries as $ind)
                    {{$ind->control->name}} ,
                @endforeach
            </td>

            <?php $processes = $ls->rc->controls->where('type','bprocess');?>
            <td>
                @foreach($processes as $bp)
                    {{$bp->control->name}} ,
                @endforeach
            </td>

            <?php $frameworks = $ls->rc->controls->where('type','bframework');?>
            <td>
                @foreach($frameworks as $bf)
                    {{$bf->control->name}} ,
                @endforeach
            </td>

            <td>
            @if($ls->rc->tags)
                @foreach($ls->rc->tags as $tg)
                    {{$tg->tag->name}} ,
                @endforeach
            @endif
            </td>

            <td>{{$ls->rc->business_impact}}</td>
            <td>
                @if($ls->rc->testingsteps)
                    @foreach($ls->rc->testingsteps as $tstep)
                                       {{$tstep->step}} ,
                    @endforeach
                @endif
            </td>

            <td>{{$ls->rc->likes->count()}}</td>
            <td>{{$ls->rc->dislikes->count()}}</td>
            <td>{{views($ls->rc)->count()}}</td>
            <td>{{$ls->rc->bookmarks->count()}}</td>
            <td>{{$ls->rc->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

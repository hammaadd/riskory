<div class="row">
    <div class="col-12">
        <div class="row ">
            <div class="col-12 pl-md-5">
                <ul id="category-ul">
                    @foreach($data as $dat)
                        <livewire:load-public-child-categories :dat='$dat'>
                    @endforeach
                <ul>
            </div>
        </div>
    </div>
    <div class="col-12">
        @if($data->hasMorePages())
        <livewire:load-more-categories-public :page="$page" :perPage="$perPage" :req="$req" />
        @endif
    </div>

</div>


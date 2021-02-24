<style>
  .sortByDropdown .dropdown-menu {
    max-width: 10rem;
    width: 100%;
  }
  </style>
<form action="{{route('filter.user.riskcontrols')}}" method="GET" id="sortFilters">
<div class="dropdown d-inline sortByDropdown">

  <a href="#" class="text-center mx-2 my-1" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent" title="Sort results"><i class="fas fa-sort"></i></a>
  <div class="dropdown-menu px-1 py-1" aria-labelledby="dropdownMenuLink">
    <span class="triangle"><span class="triangle--empty"></span></span>
      <h6 class="dropdown-header">Sort by</h6>

          <input type="hidden" name="order" value=@if(isset($_GET['order'])&&$_GET['order']=='DESC') "DESC" @else "ASC" @endif>
      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="date" name="stype" id="defaultCheck1" @if(isset($_GET['stype'])&&$_GET['stype']=='date') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Date
          </label>
      </div>

      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="views" name="stype" id="defaultCheck1" @if(isset($_GET['stype'])&&$_GET['stype']=='views') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Views
          </label>
      </div>

      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="rating" name="stype" id="defaultCheck1" @if(isset($_GET['stype'])&&$_GET['stype']=='rating') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Rating
          </label>
      </div>

      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="likes" name="stype" id="defaultCheck1" @if(isset($_GET['stype'])&&$_GET['stype']=='likes') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Likes
          </label>
      </div>

      <div class="form-group mt-3 d-flex justify-content-around">
        <a href="#"  class="text-center mx-2 my-1 d-inline-block @if(isset($_GET['order'])&&$_GET['order']=='DESC') @else color-r @endif" onclick="toggleButtons(this.id)" id="ASC" title="Ascending"><i class="fas fa-sort-amount-up-alt font-20"></i></a>
        <a href="#" class="text-center mx-2 my-1 d-inline-block @if(isset($_GET['order'])&&$_GET['order']=='DESC') color-r @endif" onclick="toggleButtons(this.id)" id="DESC" title="Descending"><i class="fas fa-sort-amount-down font-20" ></i></a>
      </div>

      <button class="btn btn-secondary btn-block" type="submit">Sort</button>
  </div>
</div>
<div class="dropdown d-inline sortByDropdown">
  <a href="#" class="text-center mx-2 my-1" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent" title="Sort results"><i class="fas fa-filter"></i></a>
  <div class="dropdown-menu px-1 py-1" aria-labelledby="dropdownMenuLink2">
    <span class="triangle"><span class="triangle--empty"></span></span>
      <h6 class="dropdown-header">Filter by date</h6>
      <div class="form-check mx-1 my-1">
        <input class="form-check-input" type="checkbox" value="doFilter" id="dateFilterRadio" name="date" onclick="dateshow(this.id)" @if(isset($_GET['date'])) checked @endif>
        <label class="form-check-label" for="defaultCheck1">
          Date
        </label>
      </div>
      <fieldset id="dateFilterSet" @if(!isset($_GET['date'])) style="display: none;" @endif>
        <div class="form-group">
          <label for="start">Start</label>
          <input id="start" type="date" class="form-control" name="startDate" @if(isset($_GET['startDate'])) value="{{$_GET['startDate']}}" @endif>
        </div>
        <div class="form-group">
          <label for="end">End</label>
          <input id="end" type="date" class="form-control" name="endDate" @if(isset($_GET['endDate'])) value="{{$_GET['endDate']}}" @endif>
        </div>
      </fieldset>

      <h6 class="dropdown-header">Filter by status</h6>
      <div class="form-group">
        <select name="status" id="status" class="filter-button">
          <option value="A" @if(isset($_GET['status'])) @if($_GET['status']=='A') selected @endif @endif>Approved</option>
          <option value="P" @if(isset($_GET['status'])) @if($_GET['status']=='P') selected @endif @endif>Pending</option>
          <option value="All" @if(isset($_GET['status'])) @if($_GET['status']=='All') selected @endif @endif>All</option>
        </select>
      </div>

      @if(isset($_GET['type']))
        <input type="hidden" name="type" value="{{$_GET['type']}}">
      @endif
      @if(isset($control->id))
      <input type="hidden" name="control" value="{{$control->id}}">
      @elseif(isset($_GET['control']))
      <input type="hidden" name="control" value="{{$_GET['control']}}">
      @endif



      <button class="btn btn-secondary btn-block" onclick="$('#sortFilters').submit()">Apply filters</button>

  </div>

</div>
</form>


<script>
  function dateshow(id){
    if($('#'+id).prop('checked') == true){
      $('#dateFilterSet').show();
    }else{
      $('#dateFilterSet').hide();
    }
  }

  $(document).on('click', '.sortByDropdown .dropdown-menu', function (e) {
  e.stopPropagation();
});
</script>

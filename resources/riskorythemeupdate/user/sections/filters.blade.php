<a href="#" class="text-center mx-2 my-1 @if(isset($_GET['order'])&&$_GET['order']=='DESC') @else color-r @endif" onclick="toggleButtons(this.id)" id="ASC" title="Ascending"><i class="fas fa-sort-amount-up-alt"></i></a>
<a href="#" class="text-center mx-2 my-1 @if(isset($_GET['order'])&&$_GET['order']=='DESC') color-r @endif" onclick="toggleButtons(this.id)" id="DESC" title="Descending"><i class="fas fa-sort-amount-down" ></i></a>
<div class="dropdown d-inline sortByDropdown">
  <a href="#" class="text-center mx-2 my-1" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent" title="Sort results"><i class="fas fa-filter"></i></a>
  <div class="dropdown-menu px-1 py-1" aria-labelledby="dropdownMenuLink">
      <span class="triangle"><span class="triangle--empty"></span></span>

      <h6 class="dropdown-header">Sort by</h6>
      <form action="{{route('filter.user.riskcontrols')}}" method="GET">
          <input type="hidden" name="order" value=@if(isset($_GET['order'])&&$_GET['order']=='DESC') "DESC" @else "ASC" @endif>
      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="date" name="type" id="defaultCheck1" @if(isset($_GET['type'])&&$_GET['type']=='date') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Date
          </label>
      </div>

      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="views" name="type" id="defaultCheck1" @if(isset($_GET['type'])&&$_GET['type']=='views') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Views
          </label>
      </div>

      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="rating" name="type" id="defaultCheck1" @if(isset($_GET['type'])&&$_GET['type']=='rating') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Rating
          </label>
      </div>

      <div class="form-check mx-1 my-1">
          <input class="form-check-input" type="radio" value="likes" name="type" id="defaultCheck1" @if(isset($_GET['type'])&&$_GET['type']=='likes') checked @endif>
          <label class="form-check-label" for="defaultCheck1">
            Likes
          </label>
      </div>

      <button class="btn btn-secondary btn-block mt-3" type="submit">Apply filters</button>
  </form>
  </div>
</div>
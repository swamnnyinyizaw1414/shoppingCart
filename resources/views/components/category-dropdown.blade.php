<div class="">
        <!-- <select name="" id="" class="p-1 rounded-pill">
          <option value="">Filter by Category</option>
        </select> -->

        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
           {{isset($currentCategory) ? $currentCategory->name : "Filter by Category"}}
          </button>
          <ul class="dropdown-menu">
          @foreach($categories as $category)
            <li><a class="dropdown-item" href="?category={{$category->slug}} {{request('search') ? '&search='.request('search') : ''}}{{request('author') ? '&author='.request('author') : ''}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>

        <!-- <select name="" id="" class="p-1 rounded-pill mx-3">
          <option value="">Filter by Tag</option>
        </select> -->
</div>
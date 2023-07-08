<x-card-wrapper> 
          <form action="/blogs/{{$blog->slug}}/comments" method="post">
            @csrf
            <x-error name="body" />
            <div class="mb-3">
            <textarea name="body" id="" cols="10" class="form-control mb-2 border-0" rows="5" placeholder="say something..."></textarea>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary justify-content-end">Submit</button>
            </div>
          </div>
          </form>
</x-card-wrapper>
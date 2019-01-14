<!-- Large modal -->
<div class="modal fade" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body mt-5 mb-4">
        <form>
          <div class="container">
            <div class="form-row">
             <div class="form-group col-md-6">
               <div class="input-group">
                 <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                  <button class="btn btn-success rounded-0" type="button" id="button-addon2">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
             </div>
             <div class="form-group col-md-2">
               <button class="btn btn-success ml-2 rounded-0">
                 <i class="fas fa-sliders-h fa-1x"></i> Filters
               </button>
             </div>
             <div class="form-group col-md-4 d-flex">
               <label class="mt-2 mr-2" for="filter_category"><strong>Sort:</strong></label>
               <select class="form-control" id="filter_category"
               name="filter_category" value="{{ old('filter_category') }}" required autofocus>
                   <option>Newest</option>
                   <option>Older</option>
               </select>
             </div>
           </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2" id="myPost">
                <div class="form-check mt-1 pt-1">
                  <input class="form-check-input" type="checkbox" id="myPost" name="myPost">
                  <label class="form-check-label" for="myPost" id="myPost">
                    My Post
                  </label>
                </div>
              </div>
              <div class="form-group col-md-2" id="postBy">
                <input type="text" class="form-control" id="postBy" placeholder="Post By">
              </div>
              <div class="form-group col-md-2" id="postFor">
                <select id="postFor" class="form-control">
                  <option selected>Post for</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2" id="categories">
                <select id="categories" class="form-control">
                  <option selected>Categories</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2" id="status">
                <select id="status" class="form-control">
                  <option selected>Status</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2" id="online-checkbox">
                <div class="form-check mt-1 pt-1 ml-3" id="online-checkbox">
                  <input class="form-check-input" type="checkbox" id="online-checkbox">
                  <label class="form-check-label" for="online-checkbox">
                    <i class="fas fa-user-check"></i> Online
                  </label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <div class="input-group">
                  <input type="text" class="form-control" id="filter_service_location" placeholder="Service Location">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="filter_service_location">
                          <i class="fas fa-map-marker-alt"></i>
                      </span>
                  </div>
               </div>
              </div>
              <div class="form-group col-md-3">
                <div class="input-group">
                  <input type="text" class="form-control" id="filter_within_miles" placeholder="Within miles">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="filter_within_miles">
                          miles
                      </span>
                  </div>
               </div>
              </div>
              <div class="form-group col-md-3">
                <div class="input-group">
                  <input type="text" class="form-control" id="filter_user_location" placeholder="User Location">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="filter_user_location">
                          <i class="fas fa-map-marker-alt"></i>
                      </span>
                  </div>
               </div>
              </div>
              <div class="form-group col-md-3 d-flex">
                <input type="text" class="form-control" id="filter_budget_min" placeholder="$ Min">
                <input type="text" class="form-control ml-2" id="filter_budget_max" placeholder="$ Max">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

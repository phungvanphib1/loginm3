<!-- #modalFilterColumns -->
<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel"
    aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content" style="height: fit-content" >
            <!-- .modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalFilterColumnsLabel"> Lọc nâng cao </h5>
            </div><!-- /.modal-header -->
            <!-- .modal-body -->
            <div class="modal-body">
                <!-- #filter-columns -->
                <div id="filter-columns">
                    <!-- .form-row -->
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="" for="nameVi">Thể Loại</label>
                        </div>
                        <div class="col-lg-12">
                            <select class="form-control" name="category_id" id="category_id" >
                                <option style="text-align: center" value="">-----Chọn Thể Loại-----</option>
                                @foreach ($categories as $category)
                                    <option <?= request()->category_id == $category->id ? 'selected' : '' ?> value="{{  $category->id }}">{{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">


                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Khoảng giá (VND)
                                </label>
                                <input type="text"  class="form-control" value="{{ request()->startPrice }}"
                                    name="startPrice" id="startPrice" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="name">&nbsp</label>
                                <input type="text"  class="form-control" name="endPrice" value="{{ request()->endPrice }}"
                                    id="endPrice" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="name">Ngày thêm sản phẩm
                                </label>
                                <input type="date" name="start_date" placeholder="dd/mm/yyyy"
                                    class="form-control start_date" value="{{ request()->start_date }}"
                                    min="{{ Carbon\Carbon::now()->firstOfYear()->format('d-m-Y') }}"
                                    max="{{ Carbon\Carbon::now()->lastOfYear()->format('d-m-Y') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="name">&nbsp</label>
                                <input type="date" value="{{ request()->end_date }}" class="form-control" name="end_date" placeholder="dd/mm/yyyy"
                                    class="form-control end_date">
                            </div>
                        </div>
                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
        <!-- .modal-footer -->
        <hr>
        <div class="modal-footer justify-content-start">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="{{route('product.index')}}" type="submit" class="btn btn-danger">Đặt lại</a>
            <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto"
                id="clear-filter">Hủy</button>
        </div><!-- /.modal-footer -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->

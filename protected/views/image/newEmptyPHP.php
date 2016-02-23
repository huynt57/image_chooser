<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Chi tiết báo cáo mã <%= data.id %></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Người báo cáo:</label>
                <input class="form-control" id="username" name="username" disabled value="<%= data.user.name %>">
                <p class="error-block" id="name-error"></p>
            </div>
            <div class="form-group">
                <label>Số điện thoại:</label>
                <input class="form-control" id="phone" name="phone" disabled value="<%= data.user.phone %>">
                <p class="error-block" id="name-error"></p>
            </div>
            <div class="form-group">
                <label>Thời gian báo cáo:</label>
                <input class="form-control" id="date" name="date" disabled value="<%= data.date %>">
                <p class="error-block" id="name-error"></p>
            </div>
            <div class="form-group">
                <label>Nội dung báo cáo</label>
                <textarea disabled rows="6" class="form-control" id="content" name="content" ><%= data.content %></textarea>
                <p class="error-block" id="description-error"></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input class="form-control" id="name" name="name" disabled value="<%= data.product.name %>">
                <p class="error-block" id="name-error"></p>
            </div>
            <!--            <div class="form-group">
                           <label>Tên sản phẩm viết tắt</label>
                            <input class="form-control" id="short_name" name="short_name" disabled value="<%= data.product.short_name %>">
                            <p class="error-block" id="short-name-error"></p>
                        </div>
                        <div class="form-group">
                           <label>Miêu tả sản phẩm</label>
                            <textarea required rows="6" class="form-control" id="description" name="description" ><%= data.product.description %></textarea>
                            <p class="error-block" id="description-error"></p>
                        </div>-->
            <div class="form-group">
                <label>Giấy tờ liên quan:</label>
                <% data.product.documents.forEach(function(document)  { %>
                <div class="checkbox row">
                    <div class="col-md-6">
                        <label><input type="checkbox" name="documents" disabled value="<%= document.id %>" checked><%= document.name %></label>

                    </div>
                    <div class="col-md-6">
                        <label>Hết hạn: <%= document.end_date %></label>
                    </div>
                </div>                            
                <% }); %>
            </div>
            <div class="form-group">
                <label>Nhà phân phối:</label>
                <% data.product.distributors.forEach(function(distributor)  { %>
                <div class="checkbox row">
                    <div class="col-md-12">
                        <label><input type="checkbox" name="distributors" disabled value="<%= distributor.id %>" checked>
                            <%= distributor.name %> - <%= distributor.address %>
                        </label>

                    </div>

                </div>
                <% }); %>
            </div>
        </div>


    </div>

</div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>

</div>
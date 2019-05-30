class StaticPagesController < ApplicationController
  def home
    @q = Product.ransack(params[:q])
    @products = @q.result.order_by_create.paginate(page: params[:page], per_page: 20)
  end
end

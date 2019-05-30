class Manage::ProductsController < ApplicationController

  before_action :authenticate_user!
  before_action :load_catalogs, expect: :index

  def new
    @product = Product.new
    respond_to do |format|
      format.js
    end
  end

  def create
    @product = current_user.products.build(product_params)
    if @product.save
      flash[:success] = "Add product success!"
    else
      flash[:dange] = "Add product fail!"
    end
    redirect_to manage_products_path
  end

  def index
    @q = Product.ransack(params[:q])
    @products = @q.result.order_by_create.paginate(page: params[:page], per_page: 20)
  end

  private

  def product_params
    params.require(:product).permit(:name, :description, :price, :quantity,
      :catalog_id, :image)
  end

  def load_catalogs
    @catalogs = Catalog.sort_by_name_at_asc.map{|c| [c.name, c.id]}
  end
end

class Manage::ProductsController < ApplicationController
  before_action :authenticate_user!
  before_action :load_catalogs, except: %i(index destroy)
  before_action :load_product, except: %i(create new index)

  def index
    @q = Product.ransack(params[:q])
    @products = @q.result.order_by_create.paginate(page: params[:page], per_page: 20)
  end

  def new
    @product = Product.new
  end

  def create
    @product = current_user.products.build(product_params)
    @product.save
  end

  def edit
  end

  def update
    @product.update_attributes(product_params)
  end

  def delete
  end

  def destroy
    @product.destroy
  end

  private

  def product_params
    params.require(:product).permit(:name, :description, :price, :quantity,
      :catalog_id, :image)
  end

  def load_product
    @product = Product.find_by(id: params[:id])
    return if @product
    flash[:danger] = "Product not found"
    redirect_to manage_products_path
  end

  def load_catalogs
    @catalogs = Catalog.sort_by_name_at_asc.map{|c| [c.name, c.id]}
  end
end

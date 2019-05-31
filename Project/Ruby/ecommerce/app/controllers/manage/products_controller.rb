class Manage::ProductsController < ApplicationController
  before_action :authenticate_user!
  before_action :load_catalogs, except: %i(index destroy)
  before_action :load_product, except: %i(create new index)

  respond_to :html, :json

  def index
    @q = Product.ransack(params[:q])
    @products = @q.result.order_by_create.paginate(page: params[:page], per_page: 20)
  end

  def new
    @product = Product.new
    respond_modal_with @product
  end

  def create
    @product = current_user.products.build(product_params)
    if @product.save
      flash[:success] = "Add product success!"
    else
      flash[:danger] = "Add product fail!"
    end
    respond_modal_with @product, location: manage_products_path
  end

  def edit
    respond_modal_with @product
  end

  def update
    if @product.update_attributes(product_params)
      flash[:success] = "Edit product success!"
    else
      flash[:danger] = "Edit product fail!"
    end
    respond_modal_with @product, location: manage_products_path
  end

  def destroy
    if @product.destroy
      flash[:success] = "Product delete"
    else
      flash[:danger] = "Product delete error"
    end
    redirect_to manage_products_path
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
    redirect_to :root
  end

  def load_catalogs
    @catalogs = Catalog.sort_by_name_at_asc.map{|c| [c.name, c.id]}
  end
end

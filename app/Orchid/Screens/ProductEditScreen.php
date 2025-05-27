<?php

namespace App\Orchid\Screens;

use App\Models\Product;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ProductEditScreen extends Screen
{
	public $product;

	/**
	 * Fetch data to be displayed on the screen.
	 *
	 * @return array
	 */
	public function query(Product $product): iterable
	{
		return [
			'product' => $product
		];
	}

	/**
	 * The name of the screen displayed in the header.
	 *
	 * @return string|null
	 */
	public function name(): ?string
	{
		return $this->product->exists ? 'Edit product' : 'Creating a product';
	}

	/**
	 * The screen's action buttons.
	 *
	 * @return \Orchid\Screen\Action[]
	 */
	public function commandBar(): iterable
	{
		return [
			Button::make('Create product')
				->icon('pencil')
				->method('createOrUpdate')
				->canSee(!$this->product->exists),

			Button::make('Update')
				->icon('note')
				->method('createOrUpdate')
				->canSee($this->product->exists),

			Button::make('Remove')
				->icon('trash')
				->method('remove')
				->canSee($this->product->exists),
		];
	}

	/**
	 * The screen's layout elements.
	 *
	 * @return \Orchid\Screen\Layout[]|string[]
	 */
	public function layout(): iterable
	{
		return [
			Layout::rows([
				Input::make('product.name')
					->title('Name')
					->placeholder('Product name')
					->help('Specify a name of this product.'),
					
				Input::make('product.title')
					->title('Title')
					->placeholder('Product title')
					->help('Specify a short descriptive title for this product.'),

				TextArea::make('product.description')
					->title('Description')
					->rows(3)
					->maxlength(200)
					->placeholder('Brief description for preview'),

				Cropper::make('product.image')
                	->targetUrl()
                	->title('Large web banner image, generally in the front and center')
                	->width(500)
                	->height(500),
			])
		];
	}

	
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $this->product->fill($request->get('product'))->save();

        Alert::info('You have successfully created a product card.');

        return redirect()->route('platform.product.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->product->delete();

        Alert::info('You have successfully deleted the product card.');

        return redirect()->route('platform.product.list');
    }
}

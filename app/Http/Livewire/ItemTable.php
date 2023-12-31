<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent};

class ItemTable extends PowerGridComponent
{
    use ActionButton;

    public function setUp():array
    {
        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Item::query()->leftJoin('genres', 'items.genre_id', '=', 'genres.id')
            ->select('items.*', 'genres.name as genre');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('item_unique_id')

           /** Example of custom column using a closure **/
            ->addColumn('item_unique_id_lower', function (Item $model) {
                return strtolower(e($model->item_unique_id));
            })

            ->addColumn('genre')
            ->addColumn('title')
            ->addColumn('author')
            ->addColumn('magazine')
            ->addColumn('volumes')
            ->addColumn('created_at_formatted', fn (Item $model) => Carbon::parse($model->created_at)->format('d-m-Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('#SERIAL', 'item_unique_id')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('GENRE TYPE', 'genre')
                ->sortable()
                ->searchable()
                ->makeInputSelect(Category::all(),'name',null,['class']),

            Column::make('TITLE', 'title')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('AUTHOR', 'author')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('MAGAZINE', 'magazine')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('VOLUMES', 'volumes')
                ->makeInputRange(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

        ];
    }

    public function actions(): array
    {
        return [
            Button::make('read', '<i class="fas fa-info-circle"></i>')
                ->class('btn btn-info btn-circle btn-sm')
                ->route('read-item-view', ['id' => 'id'])->target(''),

            Button::make('edit', '<i class="fas fa-pen"></i>')
                ->class('btn btn-warning btn-circle btn-sm'),
                // ->route('item.edit', ['item' => 'id']),

            Button::make('destroy', '<i class="fas fa-trash"></i>')
                ->class('btn btn-danger btn-circle btn-sm')
                // ->route('item.destroy', ['item' => 'id'])
                ->method('delete')
            ];
    }

    /*
    public function actionRules(): array
    {
        return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($item) => $item->id === 1)
                ->hide(),
        ];
    }
    */
}

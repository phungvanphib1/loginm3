<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importGroups();
        $this->importRoles();
        $this->importGroupRole();
        $this->importUser();

        $this->importCategory();
        $this->importProduct();


    }
    public function importRoles()
    {
        $groups = ['Category', 'User','Product','Group'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importGroupRole()
    {
        for ($i = 1; $i <= 28; $i++) {
            DB::table('group_role')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importGroups()
    {
        $userGroup = new Group();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new Group();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }
    public function importUser()
    {
        $user = new User();
        $user->name = 'Mai Xuân Cường';
        $user->email = 'cuong@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2002/09/24';
        $user->address = 'Quảng Trị';
        $user->image = 'cuong.jpg';
        $user->phone = '0935779035';
        $user->gender = 'Nam';
        $user->group_id = '2';
        $user->image = 'logo-search-grid-1x.png';
        $user->save();

        $user = new User();
        $user->name = 'Phùng Văn Phi';
        $user->email = 'phi@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2002/04/24';
        $user->address = 'Quảng Trị';
        $user->image = 'phi.jpg';
        $user->phone = '0777333274';
        $user->gender = 'Nam';
        $user->group_id = '3';
        $user->image = 'logo-search-grid-1x.png';
        $user->save();

        $user = new User();
        $user->name = 'Hoàng Thanh Hải';
        $user->email = 'hai@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->group_id = '3';
        $user->gender = 'Nam';
        $user->image = 'logo-search-grid-1x.png';
        $user->save();

        $user = new User();
        $user->name = 'Nguyễn Ngọc Dương';
        $user->email = 'duong@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2001/03/21';
        $user->phone = '0123456789';
        $user->address = 'Quảng Trị';
        $user->group_id = '4';
        $user->gender = 'Nam';
        $user->image = 'logo-search-grid-1x.png';
        $user->save();

        $user = new User();
        $user->name = 'Trần Ngọc Vinh';
        $user->email = 'vinh@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '2003/11/11';
        $user->phone = '0123456788';
        $user->address = 'Quảng Trị';
        $user->group_id = '1';
        $user->gender = 'Nam';
        $user->image = 'logo-search-grid-1x.png';
        $user->save();
    }

    public function importCategory()
    {
        $category = new Category();
        $category->name = 'Áo KhoácNow';
        $category->save();

        $category = new Category();
        $category->name = 'Áo phongNow';
        $category->save();

        $category = new Category();
        $category->name = 'Áo PoloNow';
        $category->save();

        $category = new Category();
        $category->name = 'Quần from rộng';
        $category->save();

        $category = new Category();
        $category->name = 'Quần Đùi';
        $category->save();

        $category = new Category();
        $category->name = 'Nón lưỡi trai';
        $category->save();


    }
    public function importProduct()
    {
        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 1';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 2;
        $product->image = 'ao.jpg';
        $product->save();

        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 2';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 2;
        $product->image = 'ao.jpg';
        $product->save();

        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 3';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 5;
        $product->image = 'ao.jpg';
        $product->save();

        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 4';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 4;
        $product->image = 'ao.jpg';
        $product->save();

        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 5';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 3;
        $product->image = 'ao.jpg';
        $product->save();

        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 6';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 2;
        $product->image = 'ao.jpg';
        $product->save();

        $product = new Product();
        $product->name = 'DOUBLE NECK POLO SHIRTS - 7';
        $product->price = 450000;
        $product->	amount = 100;
        $product->description = 'Quảng Trị';
        $product->category_id  = 1;
        $product->image = 'ao.jpg';
        $product->save();

    }
}

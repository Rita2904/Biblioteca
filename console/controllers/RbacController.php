<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        //$auth->removeAll();

        // add "createBook" permission
        $createBook = $auth->createPermission('createBook');
        $createBook->description = 'Create a book';
        $auth->add($createBook);


        // add "createUser" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a user';
        $auth->add($createUser);

        //add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);


        // add "updateBook" permission
        $updateBook = $auth->createPermission('updateBook');
        $updateBook->description = 'Update book';
        $auth->add($updateBook);


        // add "updateUser" permission
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Update user';
        $auth->add($updateUser);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);


        //roles

        // add "admin" role and give this role the "createUser" permission
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $createBook);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $updateBook);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $updatePost);


        // add "bookManager" role and give this role the permissions
        $bookManager = $auth->createRole('bookManager');
        $auth->add($bookManager);
        $auth->addChild($bookManager, $createBook);
        $auth->addChild($bookManager, $updateBook);


        // add "librarian" role and give this role the permissions
        $librarian = $auth->createRole('librarian');
        $auth->add($librarian);
        $auth->addChild($librarian, $createPost);
        $auth->addChild($librarian, $updatePost);



        // Assign roles to users
        $auth->assign($bookManager, 8);
        $auth->assign($admin, 7);
        $auth->assign($librarian, 9);
    }
}
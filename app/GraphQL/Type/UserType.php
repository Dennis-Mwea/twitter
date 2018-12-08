<?php

namespace App\GraphQL\Type;

use GraphQL\GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
    ];

    /*
     * Uncomment following line to make the type input object.
     * http://graphql.org/learn/schema/#input-types
     */
    // protected $inputObject = true;
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'username' => [
                'type' => Type::string(),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'avatar' => [
                'type' => Type::string(),
            ],
            'cover' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ],
            // counts
            'followers_count' => [
                'type' => Type::int(),
            ],
            'likes_count' => [
                'type' => Type::int(),
            ],
            'tweets_count' => [
                'type' => Type::int(),
            ],
            'is_following' => [
                'type' => Type::boolean(),
            ],
            'tweeets' => [
                'args' => [
                    'id' => [
                        'type' => Type::int(),
                    ],
                    'first' => [
                        'type' => Type::int(),
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('tweet')),
            ],
            'profile' => [
                'type' => GraphQL::type('Profile'),
            ],
            'followers' => [
                'args' => [
                    'id' => [
                        'type' => Type::int(),
                    ],
                    'first' => [
                        'type' => Type::int(),
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('User')),
            ],
            'following' => [
                'args' => [
                    'id' => [
                        'type' => Type::int(),
                    ],
                    'first' => [
                        'type' => Type::int(),
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('User')),
            ],
        ];
    }

    /**
     * If you want to resolve the field yourself, you can declare a method
     * with the following format resolve[FIELDNAME]field().
     */
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }

    protected function resolveCreatedAtField($root, $args)
    {
        return (string) $root->created_at->toFormattedDateString();
    }

    protected function resolveIsFollowingField($root)
    {
        return auth()->user()->isFollowing($root->id);
    }
}

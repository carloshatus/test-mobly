<?php

namespace App\Repositories;

use Exception;
use App\Entities\User;

class UserRepository
{
    public function create($input)
    {
        try {
            $user = [
                'id' => $input->id,
                'name' => $input->name,
                'username' => $input->username,
                'email' => $input->email,
                'phone' => $input->phone,
                'website' => $input->website
            ];
            $newUser = User::create($user);
            $addressInput = $input->address;
            if (isset($addressInput)) {
                $address = [
                    'street' => $addressInput->street,
                    'suite' => $addressInput->suite,
                    'city' => $addressInput->city,
                    'zipcode' => $addressInput->zipcode
                ];
                $newUser->address()->create($address);
                $addressUser = $newUser->address;
                $geoInput = $addressInput->geo;
                if (isset($geoInput) && $addressUser) {
                    $geo = [
                        'lat' => $geoInput->lat,
                        'lng' => $geoInput->lng,
                    ];
                    $addressUser->geo()->create($geo);
                }
            }
            $companyInput = $input->company;
            if (isset($companyInput)) {
                $company = [
                    'name' => $companyInput->name,
                    'catchPhrase' => $companyInput->catchPhrase,
                    'bs' => $companyInput->bs
                ];
                $newUser->company()->create($company);
            }
            return $this->getById($newUser->id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update($input, $id)
    {
        try {
            $userCurrent = User::find($id);
            $user = [
                'id' => $input->id,
                'name' => $input->name,
                'username' => $input->username,
                'email' => $input->email,
                'phone' => $input->phone,
                'website' => $input->website
            ];
            $userCurrent->update($user);
            $addressInput = $input->address;
            if (isset($addressInput)) {
                $address = [
                    'street' => $addressInput->street,
                    'suite' => $addressInput->suite,
                    'city' => $addressInput->city,
                    'zipcode' => $addressInput->zipcode
                ];
                $addressUser = $userCurrent->address;
                $addressUser->update($address);
                $geoInput = $addressInput->geo;
                if (isset($geoInput) && $addressUser) {
                    $geo = [
                        'lat' => $geoInput->lat,
                        'lng' => $geoInput->lng,
                    ];
                    $addressUser->geo->update($geo);
                }
            }
            $companyInput = $input->company;
            if (isset($companyInput)) {
                $company = [
                    'name' => $companyInput->name,
                    'catchPhrase' => $companyInput->catchPhrase,
                    'bs' => $companyInput->bs
                ];
                $companyUser = $userCurrent->company;
                $companyUser->update($company);
            }
            $this->getById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAll()
    {
        $users = User::with(['address.geo', 'company'])->get();
        return $users;
    }

    public function getById($id)
    {
        $user = User::with(['address.geo', 'company'])->find($id);
        return $user;
    }

    public function getPosts($id)
    {
        $posts = User::find($id)->posts->all();
        return $posts;
    }

    public function delete($id)
    {
        try {
            $userCurrent = User::find($id);
            $addressUser = $userCurrent->address;
            if (isset($addressUser)) {
                $geoUser = $addressUser->geo;
                if (isset($geoUser))
                    $geoUser->delete();
                $addressUser->delete();
            }
            $companyUser = $userCurrent->company;
            if (isset($companyUser))
                $companyUser->delete();
            $userCurrent->delete();
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\DocumentPermitionType;
use App\Models\User;


class DocumentPolicy
{
    /**
     * Determine whether the Document can view any models.
     */
    public function viewAny(Document $document): bool
    {
        return true;
    }

    /**
     * Determine whether the Document can view the model.
     */
    public function view(User $user, Document $document): bool
    {
        $queryResult = User::query()
            ->join("document_permition_types", "users.department_id", "=", "document_permition_types.department_id")
            ->join("documents", "document_permition_types.document_id", "=", "documents.id")
            ->where("document_permition_types.department_id", "=", $user->department_id)
            ->where("document_permition_types.document_id", "=", $document->id)
            ->select("document_permition_types.document_permition_id")->get();

        $hasPermission = false;
        foreach ($queryResult as $result) {
            if ($result->document_permition_id == "1") {
                $hasPermission = true;
                break;
            }
        }
        if(!$hasPermission){
            $queryResult = User::query()
                ->join("document_permition_types", "users.id", "=", "document_permition_types.user_id")
                ->join("documents", "document_permition_types.document_id", "=", "documents.id")
                ->where("document_permition_types.user_id", "=", $user->id)
                ->where("document_permition_types.document_id", "=", $document->id)
                ->select("document_permition_types.document_permition_id")->get();

            $hasPermission = false;
            foreach ($queryResult as $result) {
                if ($result->document_permition_id == "1") {
                    $hasPermission = true;
                    break;
                }
            }
        }

        return $hasPermission;
    }


    /**
     * Determine whether the Document can create models.
     */
    public function create(): bool
    {
        return true;
    }

    /**
     * Determine whether the Document can update the model.
     */
    public function update(User $user, Document $document): bool
    {
        $queryResult = User::query()
            ->join("document_permition_types", "users.department_id", "=", "document_permition_types.department_id")
            ->join("documents", "document_permition_types.document_id", "=", "documents.id")
            ->where("document_permition_types.department_id", "=", $user->department_id)
            ->where("document_permition_types.document_id", "=", $document->id)
            ->select("document_permition_types.document_permition_id")->get();

        $hasPermission = false;
        foreach ($queryResult as $result) {
            if ($result->document_permition_id == "2") {
                $hasPermission = true;
                break;
            }
        }
        if(!$hasPermission){
            $queryResult = User::query()
                ->join("document_permition_types", "users.id", "=", "document_permition_types.user_id")
                ->join("documents", "document_permition_types.document_id", "=", "documents.id")
                ->where("document_permition_types.user_id", "=", $user->id)
                ->where("document_permition_types.document_id", "=", $document->id)
                ->select("document_permition_types.document_permition_id")->get();

            $hasPermission = false;
            foreach ($queryResult as $result) {
                if ($result->document_permition_id == "2") {
                    $hasPermission = true;
                    break;
                }
            }
        }

        return $hasPermission;
    }


    /**
     * Determine whether the Document can delete the model.
     */
    public function delete(User $user, Document $document): bool
    {
        $queryResult = User::query()
            ->join("document_permition_types", "users.department_id", "=", "document_permition_types.department_id")
            ->join("documents", "document_permition_types.document_id", "=", "documents.id")
            ->where("document_permition_types.department_id", "=", $user->department_id)
            ->where("document_permition_types.document_id", "=", $document->id)
            ->select("document_permition_types.document_permition_id")->get();

        $hasPermission = false;
        foreach ($queryResult as $result) {
            if ($result->document_permition_id == "3") {
                $hasPermission = true;
                break;
            }
        }
        if(!$hasPermission){
            $queryResult = User::query()
                ->join("document_permition_types", "users.id", "=", "document_permition_types.user_id")
                ->join("documents", "document_permition_types.document_id", "=", "documents.id")
                ->where("document_permition_types.user_id", "=", $user->id)
                ->where("document_permition_types.document_id", "=", $document->id)
                ->select("document_permition_types.document_permition_id")->get();

            $hasPermission = false;
            foreach ($queryResult as $result) {
                if ($result->document_permition_id == "3") {
                    $hasPermission = true;
                    break;
                }
            }
        }

        return $hasPermission;
    }

    /**
     * Determine whether the Document can download the model.
     */
    public function download(User $user, Document $document): bool
    {
        $queryResult = User::query()
            ->join("document_permition_types", "users.department_id", "=", "document_permition_types.department_id")
            ->join("documents", "document_permition_types.document_id", "=", "documents.id")
            ->where("document_permition_types.department_id", "=", $user->department_id)
            ->where("document_permition_types.document_id", "=", $document->id)
            ->select("document_permition_types.document_permition_id")->get();

        $hasPermission = false;
        foreach ($queryResult as $result) {
            if ($result->document_permition_id == "4") {
                $hasPermission = true;
                break;
            }
        }
        if(!$hasPermission){
            $queryResult = User::query()
                ->join("document_permition_types", "users.id", "=", "document_permition_types.user_id")
                ->join("documents", "document_permition_types.document_id", "=", "documents.id")
                ->where("document_permition_types.user_id", "=", $user->id)
                ->where("document_permition_types.document_id", "=", $document->id)
                ->select("document_permition_types.document_permition_id")->get();

            $hasPermission = false;
            foreach ($queryResult as $result) {
                if ($result->document_permition_id == "4") {
                    $hasPermission = true;
                    break;
                }
            }
        }

        return $hasPermission;
    }


    /**
     * Determine whether the Document can restore the model.
     */
    public function restore(Document $document): bool
    {
        return true;
    }

    /**
     * Determine whether the Document can permanently delete the model.
     */
    public function forceDelete(Document $document): bool
    {
        return true;
    }
}

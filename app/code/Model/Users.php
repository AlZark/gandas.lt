<?php

declare(strict_types=1);

namespace Model;

use Core\ModelAbstract;

class Users extends ModelAbstract
{
    private int $id;

    private string $name;

    private string $lastName;

    private string $email;

    private string $password;

    private int $roleId;

    private string $nickName;

    private int $active;

    private string $createdAt;

    protected const TABLE = 'users';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $role_id
     */
    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName(string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * @return int
     */
    public function getActive(): int
    {
        return $this->active;
    }

    /**
     * @param int $active
     */
    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function assignData(): void
    {
        $this->data = [
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->roleId,
            'city_id' => $this->nickName,
            'role_id' => $this->active,
            'active' => $this->createdAt,
        ];
    }

    public function load(int $id)
    {
        $sql = $this->select();
        $sql->cols(['*'])->from('users')->where('id = :id');
        $sql->bindValue('id', $id);
        if ($rez = $this->db->getOne($sql)) {
            $this->id = (int)$rez['id'];
            $this->name = $rez['name'];
            $this->lastName = $rez['last_name'];
            $this->email = $rez['email'];
            $this->password = $rez['password'];
            $this->roleId = (int)$rez['role_id'];
            $this->nickName = $rez['nickname'];
            $this->active = (int)$rez['active'];
            $this->createdAt = $rez['created_at'];
            return $this;
        } else {
            return null;
        }
    }

    public function create()
    {
        $insert = $this->insert();
        $insert->into(self::TABLE);
        $insert->cols([
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->roleId,
            'nickname' => $this->nickName,
            'active' => $this->active,
            'created_at' => $this->createdAt,
        ]);
        $this->db->insertOne($insert);
    }
}
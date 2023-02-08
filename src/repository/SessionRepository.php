<?php

class SessionRepository extends Repository
{
    public function startSession(int $idUser)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.sessions (id_user, login_time)
            VALUES (?, ?)
        ');
        $stmt->execute([
            $idUser,
            date('Y-m-d H:i:s')
        ]);
    }

    public function endSession(int $idUser)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.sessions SET logout_time = :logout_time
            WHERE id_user = :id_user AND logout_time IS NULL
        ');
        $logoutTime = date('Y-m-d H:i:s');
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':logout_time', $logoutTime, PDO::PARAM_STR);
        $stmt->execute();
    }
}
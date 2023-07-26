<?php


namespace App\Services\Damkar\Picket;


interface PicketServiceContract
{
    public function get(int $id);

    public function store($request);

    public function update(int $id, $request);

    public function datatable($request);

    public function destroy(int $id);

    public function destroyBulk(array $id);

    public function query($request);

    public function getMember();
    public function checkDateSchedulePicket();
}

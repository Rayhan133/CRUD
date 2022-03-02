<?php

namespace App\Imports;

use App\Models\FileInfo;
use App\Models\FileInfoHasGroup;
use App\Models\FileGroupInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserFileImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        $length = count($rows);
        $total_Process = 0;
        // get last inserted data form file info
        $lastFileInfo = FileInfo::select()->orderBy('id', 'desc')->first();
        $lastFileGroupInfo = FileGroupInfo::select()->orderBy('id', 'desc')->first();
        $lastFileInfo->total_upload = $length - 1;
        $count = 1;
        $carryLength = $length;
        for ($index = 1; $index < $length; $index++) {
            $number = $rows[$index][0];

            if (is_int($number) == true) {
                $numberLength = strlen($number);
                if ($numberLength < 13) {
                    $total_Process++;
                    if ($total_Process % 100 == 0) {
                        $carryLength = $carryLength - 100;
                        $group_name = 'Sample_' . $count;
                        $setIndex = $index - 100;
                        $setLength = $index;
                        $count++;
                        $fileInfoHasGroup = FileInfoHasGroup::create([
                            'file_info_id' => $lastFileInfo->id,
                            'group_name' => $group_name,
                            'total' => 100,
                        ]);
                        $this->createFileGroupInfo($fileInfoHasGroup, $setIndex, $setLength, $rows);
                    }
                    if ($carryLength < 100 && $index == $length - 1) {
                        $count--;
                        $getLastProcess = $total_Process - ($count * 100);
                        $setIndex = $index - 100;
                        $setLength = $index;
                        $count++;
                        $group_name = 'Sample_' . $count;
                        $fileInfoHasGroup = FileInfoHasGroup::create([
                            'file_info_id' => $lastFileInfo->id,
                            'group_name' => $group_name,
                            'total' => $getLastProcess,
                        ]);
                        $this->createFileGroupInfo($fileInfoHasGroup, $setIndex, $setLength, $rows);
                    }
                }
            }
        }
        $lastFileInfo->group = $count;
        $lastFileInfo->total_process = $total_Process;
        $lastFileInfo->save();
    }


    public function createFileGroupInfo($fileInfoHasGroup, $index, $length, $rows)
    {
        for ($index; $index < $length; $index++) {
            $number = $rows[$index][0];
            $firstName = $rows[$index][1];
            $lastName = $rows[$index][2];
            $email = $rows[$index][3];
            $state = $rows[$index][4];
            $zip = $rows[$index][5];
            FileGroupInfo::create([
                'file_info_has_group_id' => $fileInfoHasGroup->id,
                'number' => $number,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'state' => $state,
                'zip' => $zip,
            ]);
        }
    }
}

<?php

namespace Infrastructure;

use Domain\Course;
use Domain\CourseId;
use Domain\Hole;
use Domain\HoleNumber;
use Domain\Holes;
use Domain\ICourseRepository;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * コースリポジトリの実装クラス
 *
 * このレイヤーは外部APIの詳細を知ってよい
 */
class GolfCourseApiRepository implements ICourseRepository
{
    public function __construct() {}

    /**
     * コースIDからコース詳細を取得する
     */
    public function findByCourseId(int $courseId): Course
    {
        $response = Http::withHeaders([
            'Authorization' => 'Key 33LZZE3NKZGKMQMLU3GASPS73M'
        ])
            ->get("https://api.golfcourseapi.com/v1/courses/{$courseId}");
        $response->throw();
        return $this->toCourse($response);
    }

    private function toCourse(Response $response): Course
    {
        $data = $response->json();
        $courseId = new CourseId($data['id']);
        $holes = Holes::empty();
        // 本来male内でも難易度別に複数のティーがあるが、本プロジェクトは練習の意味合いが強いので一番最初のティーだけを対象とする
        foreach ($data['tees']['male'][0] as $index => $rawHole) {
            $holes = $holes->add($this->toHole($index, $rawHole));
        }
        return new Course($courseId, $data['course_name'], $holes);
    }

    /**
     * @param array<string, mixed> $rawHole
     */
    private function toHole(int $holeIndex, array $rawHole): Hole
    {
        return new Hole(
            new HoleNumber($holeIndex + 1), // APIでのホール番号は0始まりのため補正する
            $rawHole['par']
        );
    }
}

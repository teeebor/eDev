<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calendar
 *
 * @ORM\Table(name="calendar", indexes={
 *     @ORM\Index(name="fk_calendar_entry_type_id", columns={"entry_type_id"}),
 *     @ORM\Index(name="fk_calendar_user_id", columns={"user_id"}),
 *     @ORM\Index(name="fk_calendar_project", columns={"project_id"}),
 *     @ORM\Index(name="fk_calendar_task", columns={"task_id"})
 *	 })
 * @ORM\Entity(repositoryClass="Application\Repository\CalendarRepository")
 */
class Calendar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="calendar_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $calendarId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time", nullable=true)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time", nullable=true)
     */
    private $endTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="calendar_day", type="date", nullable=false)
     */
    private $calendarDay;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment;

    /**
     * @var \Application\Entity\CalendarEntryType
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CalendarEntryType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entry_type_id", referencedColumnName="entry_type_id")
     * })
     */
    private $entryType;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var \Application\Entity\ProjectList
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\ProjectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="project_id")
     * })
     */
    private $project;

    /**
     * @var \Application\Entity\ProjectTasks
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\ProjectTasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="task_id")
     * })
     */
    private $task;

	/**
	 * @return ProjectList
	 */
	public function getProject()
	{
		return $this->project;
	}

	/**
	 * @param ProjectList $project
	 */
	public function setProject($project)
	{
		$this->project = $project;
	}

	/**
	 * @return ProjectTasks
	 */
	public function getTask()
	{
		return $this->task;
	}

	/**
	 * @param ProjectTasks $task
	 * @return Calendar
	 */
	public function setTask($task)
	{
		$this->task = $task;
		return $this;
	}


    /**
     * Get calendarId
     *
     * @return integer 
     */
    public function getCalendarId()
    {
        return $this->calendarId;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Calendar
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Calendar
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set calendarDay
     *
     * @param \DateTime $calendarDay
     * @return Calendar
     */
    public function setCalendarDay($calendarDay)
    {
        $this->calendarDay = $calendarDay;

        return $this;
    }

    /**
     * Get calendarDay
     *
     * @return \DateTime 
     */
    public function getCalendarDay()
    {
        return $this->calendarDay;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Calendar
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set entryType
     *
     * @param \Application\Entity\CalendarEntryType $entryType
     * @return Calendar
     */
    public function setEntryType(\Application\Entity\CalendarEntryType $entryType = null)
    {
        $this->entryType = $entryType;

        return $this;
    }

    /**
     * Get entryType
     *
     * @return \Application\Entity\CalendarEntryType 
     */
    public function getEntryType()
    {
        return $this->entryType;
    }

    /**
     * Set user
     *
     * @param \Application\Entity\User $user
     * @return Calendar
     */
    public function setUser(\Application\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        $res = array();
        foreach ($this as $k => $v) {
            $res[$k] = $v;
        }
        return $res;
    }
}

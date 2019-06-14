<?php
namespace Phooty\Commentary;

class CommentaryTeam
{
    /**
     * Commentator A
     *
     * @var Commentator
     */
    protected $commentatorA;

    /**
     * Commentator B
     *
     * @var Commentator
     */
    protected $commentatorB;

    /**
     * Special Comments A
     *
     * @var Commentator
     */
    protected $commentsA;

    /**
     * Special Comments B
     *
     * @var Commentator
     */
    protected $commentsB;

    /**
     * Boundary Rider
     *
     * @var Commentator
     */
    protected $boundaryRider;

    public function __construct()
    {
        //
    }

    /**
     * Get commentator A
     *
     * @return  Commentator
     */ 
    public function getCommentatorA()
    {
        return $this->commentatorA;
    }

    /**
     * Set commentator A
     *
     * @param  Commentator  $commentatorA  Commentator A
     *
     * @return  self
     */ 
    public function setCommentatorA(Commentator $commentatorA)
    {
        $this->commentatorA = $commentatorA;

        return $this;
    }

    /**
     * Get commentator B
     *
     * @return  Commentator
     */ 
    public function getCommentatorB()
    {
        return $this->commentatorB;
    }

    /**
     * Set commentator B
     *
     * @param  Commentator  $commentatorB  Commentator B
     *
     * @return  self
     */ 
    public function setCommentatorB(Commentator $commentatorB)
    {
        $this->commentatorB = $commentatorB;

        return $this;
    }

    /**
     * Get special Comments A
     *
     * @return  Commentator
     */ 
    public function getCommentsA()
    {
        return $this->commentsA;
    }

    /**
     * Set special Comments A
     *
     * @param  Commentator  $commentsA  Special Comments A
     *
     * @return  self
     */ 
    public function setCommentsA(Commentator $commentsA)
    {
        $this->commentsA = $commentsA;

        return $this;
    }

    /**
     * Get special Comments B
     *
     * @return  Commentator
     */ 
    public function getCommentsB()
    {
        return $this->commentsB;
    }

    /**
     * Set special Comments B
     *
     * @param  Commentator  $commentsB  Special Comments B
     *
     * @return  self
     */ 
    public function setCommentsB(Commentator $commentsB)
    {
        $this->commentsB = $commentsB;

        return $this;
    }

    /**
     * Get boundary Rider
     *
     * @return  Commentator
     */ 
    public function getBoundaryRider()
    {
        return $this->boundaryRider;
    }

    /**
     * Set boundary Rider
     *
     * @param  Commentator  $boundaryRider  Boundary Rider
     *
     * @return  self
     */ 
    public function setBoundaryRider(Commentator $boundaryRider)
    {
        $this->boundaryRider = $boundaryRider;

        return $this;
    }
}
